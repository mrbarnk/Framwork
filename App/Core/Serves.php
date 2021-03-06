<?php

// namespace Controller;

/**
 * Serves static files
 */
// use Controller;
// use Illuminate\Support\Facades\DB;

class Serves {

    /**
     * Serves forum attachments
     *
     * @return void
     */
    public $path;

    public function attachment($path) {

        $this->path = $path;
        $this->serve('/../../public/');
    }

    /**
     * Serves forum attachments preview
     *
     * @return void
     */
    public function previewAttachment() {

        $this->serve('/../../public/');
    }

    /**
     * Serves the attachment
     *
     * @return void
     */
    private function serve($path) {

        $name = $this->sanitize($this->path);
        $dir = __DIR__ . $path;

        $path = $this->setBasicheaders($name, $dir);
        header('Content-Disposition: attachment; filename="' . $this->getRealFileName($name) . '"');
        @readfile($path);
        exit;
    }

    /**
     * Serves smileys
     *
     * @return void
     */
    public function smiley() {

        $name = $this->sanitize($this->path);
        $dir = DATA_PATH . 'assets/img/smileys/';

        $path = $this->setBasicheaders($name, $dir);
        @readfile($path);
        exit;
    }

    /**
     * Gets the original name of file from table from hash
     * If not found a dummy name is returned
     *
     * @param [type] $hash
     * @return void
     */
    private function getRealFileName($hash) {

        $dummyName = "download";
        // $name = DB::table('files')
        //     ->where('id', '=', $hash)
        //     ->pluck('file_key');
        $name = $hash;
        return $name ? $name : $dummyName;
    }

    /**
     * Sets some basic headers for serving file
     *
     * @param [string] $name
     * @param [string] $dir
     * @return void
     */
    private function setBasicheaders($name, $dir) {

        $filename = $dir . $name;
        $mime_type = $this->getMimeType($filename);

        header("Content-type: $mime_type");
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+6 months")), true);
        header("Pragma: public");
        header("Cache-Control: public");

        return $filename;
    }

    /**
     * Gets the content type of the file
     * @param $file
     * @return mixed|string
     */
    private function getMimeType($file) {

        if (function_exists('finfo_file')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $type = finfo_file($finfo, $file);
            finfo_close($finfo);
            return $type;
        }

        return $file;//mime_content_type($file);
    }

    /**
     * Some security checks/sanitization
     *
     * @param [string] $name
     * @return string
     */
    private function sanitize($name) {

        $name = str_replace("..", "", $name);
        $name = str_replace("%2e%2e", "", $name);

        return $name;
    }

}
