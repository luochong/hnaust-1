<?php
// **********************************************
//
// This software is licensed by the LGPL
// -> http://www.gnu.org/copyleft/lesser.txt
// (c) 2001-2004 by Tomas Von Veschler Cox
//
// **********************************************
//
// $Id: Upload.php,v 1.42 2004/08/08 09:37:50 wenz Exp $

/*
 * Pear File Uploader class. Easy and secure managment of files
 * submitted via HTML Forms.
 *
 * Leyend:
 * - you can add error msgs in your language in the HTTP_Upload_Error class
 *
 * TODO:
 * - try to think a way of having all the Error system in other
 *   file and only include it when an error ocurrs
 *
 * -- Notes for users HTTP_Upload >= 0.9.0 --
 *
 *  Error detection was enhanced, so you no longer need to
 *  check for PEAR::isError() in $upload->getFiles() or call
 *  $upload->isMissing(). Instead you'll
 *  get the error when do a check for $file->isError().
 *
 *  Example:
 *
 *  $upload = new HTTP_Upload('en');
 *  $file = $upload->getFiles('i_dont_exist_in_form_definition');
 *  if ($file->isError()) {
 *      die($file->getMessage());
 *  }
 *
 *  --
 *
 */

require_once 'PEAR.php';

/**
 * defines default chmod
 */
define('HTTP_UPLOAD_DEFAULT_CHMOD', 0660);

/**
 * Error Class for HTTP_Upload
 *
 * @author  Tomas V.V.Cox <cox@idecnet.com>
 * @see http://vulcanonet.com/soft/index.php?pack=uploader
 * @package HTTP_Upload
 * @category HTTP
 * @access public
 */
class HTTP_Upload_Error extends PEAR
{
    /**
     * Selected language for error messages
     * @var string
     */
    var $lang = 'en';

    /**
     * Whether HTML entities shall be encoded automatically
     * @var boolean
     */
    var $html = false;

    /**
     * Constructor
     *
     * Creates a new PEAR_Error
     *
     * @param string $lang The language selected for error code messages
     * @access public
     */
    function HTTP_Upload_Error($lang = null, $html = false)
    {
        $this->lang = ($lang !== null) ? $lang : $this->lang;
        $this->html = ($html !== false) ? $html : $this->html;
        $ini_size = preg_replace('/m/i', '000000', ini_get('upload_max_filesize'));

        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.1', 'ge')) {
            $maxsize = (isset($_POST['MAX_FILE_SIZE'])) ?
                $_POST['MAX_FILE_SIZE'] : null;
        } else {
            global $HTTP_POST_VARS;
            $maxsize = (isset($HTTP_POST_VARS['MAX_FILE_SIZE'])) ?
                $HTTP_POST_VARS['MAX_FILE_SIZE'] : null;
        }

        if (empty($maxsize) || ($maxsize > $ini_size)) {
            $maxsize = $ini_size;
        }
        // XXXXX Add here error messages in your language
        $this->error_codes = array(
            'TOO_LARGE' => array(            
                'en'    => "File size too large. The maximum permitted size is: $maxsize bytes.",
                'cn'   => "文件太大.最大的大小限制为： $maxsize bytes.",

                ),
            'MISSING_DIR' => array(        
                'en'    => 'Missing destination directory.', 
                'cn'    => '你上传的文件夹不存在.',       
                ),
            'IS_NOT_DIR' => array(
      
                'en'    => 'The destination directory doesn\'t exist or is a regular file.',
          		 'cn'   => '目的地文件夹不存在,或者是一个文件.',  
                ),
            'NO_WRITE_PERMS' => array(
                'en'    => 'The destination directory doesn\'t have write perms.',
                'cn'    => '目的地文件夹不可写.'
                ),
            'NO_USER_FILE' => array(
                'en'    => 'You haven\'t selected any file for uploading.',
                'cn'    => '你没有选择任何要上传的文件.'
                ),
            'BAD_FORM' => array(
                'en'    => 'The html form doesn\'t contain the required method="post" enctype="multipart/form-data".',
                'cn'    => 'html form 请求方式不是 method="post" enctype="multipart/form-data'
                ),
            'E_FAIL_COPY' => array(
                'en'    => 'Failed to copy the temporary file.',
                'cn'    => '不能复制临时文件.'
                ),
            'E_FAIL_MOVE' => array(
                'en'    => 'Impossible to move the file.',
                 'cn'    => '不能移动这个文件',
                ),
            'FILE_EXISTS' => array(
                'en'    => 'The destination file already exists.',
                'cn'    => '目的地文件已经存在',
                ),
            'CANNOT_OVERWRITE' => array(
                'en'    => 'The destination file already exists and could not be overwritten.',
                'cn'    => '目的地文件已经存在且不能覆盖',
                ),
            'NOT_ALLOWED_EXTENSION' => array(
            	 'cn'    => '文件扩展名被禁止',
                'en'    => 'File extension not permitted.',
               
                ),
            'PARTIAL' => array(
                'en'    => 'The file was only partially uploaded.',
                'cn'    => '该文件仅部分上传.',
                ),
            'ERROR' => array(
                'en'    => 'Upload error:',
                'cn'    => '上传失败' 
                ),
            'DEV_NO_DEF_FILE' => array(
                'en'    => 'This filename is not defined in the form as &lt;input type="file" name=?&gt;.',
                'cn'    => '此文件名没有定义表单的 &lt;input type="file" name=?&gt;.' 
                )
        );
    }

    /**
     * returns the error code
     *
     * @param    string $e_code  type of error
     * @return   string          Error message
     */
    function errorCode($e_code)
    {
        if (!empty($this->error_codes[$e_code][$this->lang])) {
            $msg = $this->html ?
                html_entity_decode($this->error_codes[$e_code][$this->lang]) :
                $this->error_codes[$e_code][$this->lang];
        } else {
            $msg = $e_code;
        }

        if (!empty($this->error_codes['ERROR'][$this->lang])) {
            $error = $this->error_codes['ERROR'][$this->lang];
        } else {
            $error = $this->error_codes['ERROR']['en'];
        }
        return $error.' '.$msg;
    }

    /**
     * Overwrites the PEAR::raiseError method
     *
     * @param    string $e_code      type of error
     * @return   object PEAR_Error   a PEAR-Error object
     * @access   public
     */
    function raiseError($e_code)
    {
        return PEAR::raiseError($this->errorCode($e_code), $e_code);
    }
}

/**
 * This class provides an advanced file uploader system
 * for file uploads made from html forms

 *
 * @author  Tomas V.V.Cox <cox@idecnet.com>
 * @see http://vulcanonet.com/soft/index.php?pack=uploader
 * @package  HTTP_Upload
 * @category HTTP
 * @access   public
 */
class HTTP_Upload extends HTTP_Upload_Error
{
    /**
     * Contains an array of "uploaded files" objects
     * @var array
     */
    var $files = array();
    
    /**
     * Contains the desired chmod for uploaded files
     * @var int
     * @access private
     */
    var $_chmod = HTTP_UPLOAD_DEFAULT_CHMOD;

    /**
     * Constructor
     *
     * @param string $lang Language to use for reporting errors
     * @see Upload_Error::error_codes
     * @access public
     */
    function HTTP_Upload($lang = null)
    {
        $this->HTTP_Upload_Error($lang);
        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.1', 'ge'))
        {
            $this->post_files = $_FILES;
            if (isset($_SERVER['CONTENT_TYPE'])) {
                $this->content_type = $_SERVER['CONTENT_TYPE'];
            }
        } else {
            global $HTTP_POST_FILES, $HTTP_SERVER_VARS;
            $this->post_files = $HTTP_POST_FILES;
            if (isset($HTTP_SERVER_VARS['CONTENT_TYPE'])) {
                $this->content_type = $HTTP_SERVER_VARS['CONTENT_TYPE'];
            }
        }
    }

    /**
     * Get files
     *
     * @param mixed $file If:
     *    - not given, function will return array of upload_file objects
     *    - is int, will return the $file position in upload_file objects array
     *    - is string, will return the upload_file object corresponding
     *        to $file name of the form. For ex:
     *        if form is <input type="file" name="userfile">
     *        to get this file use: $upload->getFiles('userfile')
     *
     * @return mixed array or object (see @param $file above) or Pear_Error
     * @access public
     */
    function &getFiles($file = null)
    {
        static $is_built = false;
        //build only once for multiple calls
        if (!$is_built) {
            $files = &$this->_buildFiles();
            if (PEAR::isError($files)) {
                // there was an error with the form.
                // Create a faked upload embedding the error
                $this->files['_error'] =  new HTTP_Upload_File(
                                                       '_error', null,
                                                       null, null,
                                                       null, $files->getCode(),
                                                       $this->lang, $this->_chmod);
            } else {
                $this->files = $files;
            }
            $is_built = true;
        }
        if ($file !== null) {
            if (is_int($file)) {
                $pos = 0;
                foreach ($this->files as $obj) {
                    if ($pos == $file) {
                        return $obj;
                    }
                    $pos++;
                }
            } elseif (is_string($file) && isset($this->files[$file])) {
                return $this->files[$file];
            }
            if (isset($this->files['_error'])) {
                return $this->files['_error'];
            } else {
                // developer didn't specify this name in the form
                // warn him about it with a faked upload
                return new HTTP_Upload_File(
                                           '_error', null,
                                           null, null,
                                           null, 'DEV_NO_DEF_FILE',
                                           $this->lang);
            }
        }
        return $this->files;
    }

    /**
     * Creates the list of the uploaded file
     *
     * @return array of HTTP_Upload_File objects for every file
     */
    function &_buildFiles()
    {
        // Form method check
        if (!isset($this->content_type) ||
            strpos($this->content_type, 'multipart/form-data') !== 0)
        {
            return $this->raiseError('BAD_FORM');
        }
        // In 4.1 $_FILES isn't initialized when no uploads
        // XXX (cox) afaik, in >= 4.1 and <= 4.3 only
        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.1', 'ge'))
        {
            $error = $this->isMissing();
            if (PEAR::isError($error)) {
                return $error;
            }
        }

        // map error codes from 4.2.0 $_FILES['userfile']['error']
        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.2.0', 'ge')) {
            $uploadError = array(
                1 => 'TOO_LARGE',
                2 => 'TOO_LARGE',
                3 => 'PARTIAL',
                4 => 'NO_USER_FILE'
                );
        }


        // Parse $_FILES (or $HTTP_POST_FILES)
        $files = array();
        foreach ($this->post_files as $userfile => $value) {
            if (is_array($value['name'])) {
                foreach ($value['name'] as $key => $val) {
                    $err = $value['error'][$key];
                    if (isset($err) && $err !== 0 && isset($uploadError[$err])) {
                        $error = $uploadError[$err];
                    } else {
                        $error = null;
                    }
                    $name = basename($value['name'][$key]);
                    $tmp_name = $value['tmp_name'][$key];
                    $size = $value['size'][$key];
                    $type = $value['type'][$key];
                    $formname = $userfile . "[$key]";
                    $files[$formname] = new HTTP_Upload_File($name, $tmp_name,
                                                             $formname, $type, $size, $error, $this->lang, $this->_chmod);
                }
                // One file
            } else {
                $err = $value['error'];
                if (isset($err) && $err !== 0 && isset($uploadError[$err])) {
                    $error = $uploadError[$err];
                } else {
                    $error = null;
                }
                $name = basename($value['name']);
                $tmp_name = $value['tmp_name'];
                $size = $value['size'];
                $type = $value['type'];
                $formname = $userfile;
                $files[$formname] = new HTTP_Upload_File($name, $tmp_name,
                                                         $formname, $type, $size, $error, $this->lang, $this->_chmod);
            }
        }
        return $files;
    }

    /**
     * Checks if the user submited or not some file
     *
     * @return mixed False when are files or PEAR_Error when no files
     * @access public
     * @see Read the note in the source code about this function
     */
    function isMissing()
    {
        if (count($this->post_files) < 1) {
            return $this->raiseError('NO_USER_FILE');
        }
        //we also check if at least one file has more than 0 bytes :)
        $files = array();
        $size = 0;
        foreach ($this->post_files as $userfile => $value) {
            if (is_array($value['name'])) {
                foreach ($value['name'] as $key => $val) {
                    $size += $value['size'][$key];
                }
            } else {  //one file
                $size = $value['size'];
            }
        }
        if ($size == 0) {
            $this->raiseError('NO_USER_FILE');
        }
        return false;
    }

    /**
     * Sets the chmod to be used for uploaded files
     *
     * @param int Desired mode 
     */
    function setChmod($mode)
    {
        $this->_chmod = $mode;
    }
}

/**
 * This class provides functions to work with the uploaded file
 *
 * @author  Tomas V.V.Cox <cox@idecnet.com>
 * @see http://vulcanonet.com/soft/index.php?pack=uploader
 * @package  HTTP_Upload
 * @category HTTP
 * @access   public
 */
class HTTP_Upload_File extends HTTP_Upload_Error
{
    /**
     * If the random seed was initialized before or not
     * @var  boolean;
     */
    var $_seeded = 0;

    /**
     * Assoc array with file properties
     * @var array
     */
    var $upload = array();

    /**
     * If user haven't selected a mode, by default 'safe' will be used
     * @var boolean
     */
    var $mode_name_selected = false;

    /**
     * It's a common security risk in pages who has the upload dir
     * under the document root (remember the hack of the Apache web?)
     *
     * @var array
     * @access private
     * @see HTTP_Upload_File::setValidExtensions()
     */
    var $_extensions_check = array('php', 'phtm', 'phtml', 'php3', 'inc');

    /**
     * @see HTTP_Upload_File::setValidExtensions()
     * @var string
     * @access private
     */
    var $_extensions_mode  = 'deny';

    /**
     * Contains the desired chmod for uploaded files
     * @var int
     * @access private
     */
    var $_chmod = HTTP_UPLOAD_DEFAULT_CHMOD;

    /**
     * Constructor
     *
     * @param   string  $name       destination file name
     * @param   string  $tmp        temp file name
     * @param   string  $formname   name of the form
     * @param   string  $type       Mime type of the file
     * @param   string  $size       size of the file
     * @param   string  $error      error on upload
     * @param   string  $lang       used language for errormessages
     * @access  public
     */
    function HTTP_Upload_File($name = null, $tmp = null,  $formname = null,
                              $type = null, $size = null, $error = null, 
                              $lang = null, $chmod = HTTP_UPLOAD_DEFAULT_CHMOD)
    {
        $this->HTTP_Upload_Error($lang);
        $ext = null;

        if (empty($name) || $size == 0) {
            $error = 'NO_USER_FILE';
        } elseif ($tmp == 'none') {
            $error = 'TOO_LARGE';
        } else {
            // strpos needed to detect files without extension
            if (($pos = strrpos($name, '.')) !== false) {
                $ext = substr($name, $pos + 1);
            }
        }

        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.1', 'ge')) {
            if (isset($_POST['MAX_FILE_SIZE']) &&
                $size > $_POST['MAX_FILE_SIZE']) {
                $error = 'TOO_LARGE';
            }
        } else {
            global $HTTP_POST_VARS;
            if (isset($HTTP_POST_VARS['MAX_FILE_SIZE']) &&
                $size > $HTTP_POST_VARS['MAX_FILE_SIZE']) {
                $error = 'TOO_LARGE';
            }
        }

        $this->upload = array(
            'real'      => $name,
            'name'      => $name,
            'form_name' => $formname,
            'ext'       => $ext,
            'tmp_name'  => $tmp,
            'size'      => $size,
            'type'      => $type,
            'error'     => $error
        );

        $this->_chmod = $chmod;
    }

    /**
     * Sets the name of the destination file
     *
     * @param string $mode     A valid mode: 'uniq', 'safe' or 'real' or a file name
     * @param string $prepend  A string to prepend to the name
     * @param string $append   A string to append to the name
     *
     * @return string The modified name of the destination file
     * @access public
     */
    function setName($mode, $prepend = null, $append = null)
    {
        switch ($mode) {
            case 'uniq':
                $name = $this->nameToUniq();
                $this->upload['ext'] = $this->nameToSafe($this->upload['ext'], 10);
                $name .= '.' . $this->upload['ext'];
                break;
            case 'safe':
                $name = $this->nameToSafe($this->upload['real']);
                if (($pos = strrpos($name, '.')) !== false) {
                    $this->upload['ext'] = substr($name, $pos + 1);
                } else {
                    $this->upload['ext'] = '';
                }
                break;
            case 'real':
                $name = $this->upload['real'];
                break;
            default:
                $name = $mode;
                $this->upload['ext'] = $this->nameToSafe($this->upload['ext'], 10);
                $name .= '.' . $this->upload['ext'];
        }
        $this->upload['name'] = $prepend . $name . $append;
        $this->mode_name_selected = true;
        return $this->upload['name'];
    }

    /**
     * Unique file names in the form: 9022210413b75410c28bef.html
     * @see HTTP_Upload_File::setName()
     */
    function nameToUniq()
    {
        if (! $this->_seeded) {
            srand((double) microtime() * 1000000);
            $this->_seeded = 1;
        }
        $uniq = uniqid(rand());
        return $uniq;
    }

    /**
     * Format a file name to be safe
     *
     * @param    string $file   The string file name
     * @param    int    $maxlen Maximun permited string lenght
     * @return   string Formatted file name
     * @see HTTP_Upload_File::setName()
     */
    function nameToSafe($name, $maxlen=250)
    {
        $noalpha = '�����������������������������������������������������@���';
        $alpha   = 'AEIOUYaeiouyAEIOUaeiouAEIOUaeiouAEIOUaeiouyAaOoAaNnCcaooa';

        $name = substr($name, 0, $maxlen);
        $name = strtr($name, $noalpha, $alpha);
        // not permitted chars are replaced with "_"
        return preg_replace('/[^a-zA-Z0-9,._\+\()\-]/', '_', $name);
    }

    /**
     * The upload was valid
     *
     * @return bool If the file was submitted correctly
     * @access public
     */
    function isValid()
    {
        if ($this->upload['error'] === null) {
            return true;
        }
        return false;
    }

    /**
     * User haven't submit a file
     *
     * @return bool If the user submitted a file or not
     * @access public
     */
    function isMissing()
    {
        if ($this->upload['error'] == 'NO_USER_FILE') {
            return true;
        }
        return false;
    }

    /**
     * Some error occured during upload (most common due a file size problem,
     * like max size exceeded or 0 bytes long).
     * @return bool If there were errors submitting the file (probably
     *              because the file excess the max permitted file size)
     * @access public
     */
    function isError()
    {
        if (in_array($this->upload['error'], array('TOO_LARGE', 'BAD_FORM','DEV_NO_DEF_FILE'))) {
            return true;
        }
        return false;
    }

    /**
     * Moves the uploaded file to its destination directory.
     *
     * @param    string  $dir_dest  Destination directory
     * @param    bool    $overwrite Overwrite if destination file exists?
     * @return   mixed   True on success or Pear_Error object on error
     * @access public
     */
    function moveTo($dir_dest, $overwrite = true)
    {
        if (!$this->isValid()) {
            return $this->raiseError($this->upload['error']);
        }

        //Valid extensions check
        if (!$this->_evalValidExtensions()) {
            return $this->raiseError('NOT_ALLOWED_EXTENSION');
        }

        $err_code = $this->_chk_dir_dest($dir_dest);
        if ($err_code !== false) {
            return $this->raiseError($err_code);
        }
        // Use 'safe' mode by default if no other was selected
        if (!$this->mode_name_selected) {
            $this->setName('safe');
        }

        $name_dest = $dir_dest . DIRECTORY_SEPARATOR . $this->upload['name'];

        if (@is_file($name_dest)) {
            if ($overwrite !== true) {
                return $this->raiseError('FILE_EXISTS');
            } elseif (!is_writable($name_dest)) {
                return $this->raiseError('CANNOT_OVERWRITE');
            }
        }

        // copy the file and let php clean the tmp
        if (!@move_uploaded_file($this->upload['tmp_name'], $name_dest)) {
            return $this->raiseError('E_FAIL_MOVE');
        }
        @chmod($name_dest, $this->_chmod);
        return $this->getProp('name');
    }

    /**
     * Check for a valid destination dir
     *
     * @param    string  $dir_dest Destination dir
     * @return   mixed   False on no errors or error code on error
     */
    function _chk_dir_dest($dir_dest)
    {
        if (!$dir_dest) {
            return 'MISSING_DIR';
        }
        if (!@is_dir ($dir_dest)) {
            return 'IS_NOT_DIR';
        }
        if (!is_writeable ($dir_dest)) {
            return 'NO_WRITE_PERMS';
        }
        return false;
    }
    /**
     * Retrive properties of the uploaded file
     * @param string $name   The property name. When null an assoc array with
     *                       all the properties will be returned
     * @return mixed         A string or array
     * @see HTTP_Upload_File::HTTP_Upload_File()
     * @access public
     */
    function getProp($name = null)
    {
        if ($name === null) {
            return $this->upload;
        }
        return $this->upload[$name];
    }

    /**
     * Returns a error message, if a error occured
     * (deprecated) Use getMessage() instead
     * @return string    a Error message
     * @access public
     */
    function errorMsg()
    {
        return $this->errorCode($this->upload['error']);
    }

    /**
     * Returns a error message, if a error occured
     * @return string    a Error message
     * @access public
     */
    function getMessage()
    {
        return $this->errorCode($this->upload['error']);
    }

    /**
     * Function to restrict the valid extensions on file uploads
     *
     * @param array $exts File extensions to validate
     * @param string $mode The type of validation:
     *                       1) 'deny'   Will deny only the supplied extensions
     *                       2) 'accept' Will accept only the supplied extensions
     *                                   as valid
     * @access public
     */
    function setValidExtensions($exts, $mode = 'deny')
    {
        $this->_extensions_check = $exts;
        $this->_extensions_mode  = $mode;
    }

    /**
     * Evaluates the validity of the extensions set by setValidExtensions
     *
     * @return bool False on non valid extension, true if they are valid
     * @access private
     */
    function _evalValidExtensions()
    {
        $exts = $this->_extensions_check;
        settype($exts, 'array');
        if ($this->_extensions_mode == 'deny') {
            if (in_array($this->getProp('ext'), $exts)) {
                return false;
            }
        // mode == 'accept'
        } else {
            if (!in_array($this->getProp('ext'), $exts)) {
                return false;
            }
        }
        return true;
    }
}
?>