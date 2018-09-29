@php
    function human($bytes, $decimals = 2)
    {
        $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f %s", $bytes / pow(1024, $factor), @$size[$factor]);
    }
    function human_string($quota, $download, $upload)
    {
        $remain = $quota - $download - $upload;
        if ($remain < 0) {
            $remain = 0;
        }
        $download = human($download);
        $upload = human($upload);
        if ($quota < 0) {
            $quota = 'Infinity';
            $remain = 'Infinity';
        } else {
            $quota = human($quota);
            $remain = human($remain);
        }
        return array($quota, $download, $upload, $remain);
    }
@endphp
