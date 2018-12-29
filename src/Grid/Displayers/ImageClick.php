<?php

namespace Encore\Admin\Grid\Displayers;

use Illuminate\Contracts\Support\Arrayable;

class ImageClick extends AbstractDisplayer
{
    public function display($server = '', $width = 200, $height = 200)
    {
        if ($this->value instanceof Arrayable) {
            $this->value = $this->value->toArray();
        }

        return collect((array) $this->value)->filter()->map(function ($path) use ($server, $width, $height) {
            if (url()->isValidUrl($path)) {
                $src = $path;
            } else {

                $server = $server ?: config('admin.upload.host');
                //$src = trim($server, '/').'/'.trim($path, '/');
                $src = $server . $path;
            }
            $id = md5($src);
            $src_to_copy = str_replace('content/','',$src);
            return "
 <div style=\"display: block; position: relative;\">
    <span  id=\"content_buffer_copy_$id\" class=\"buffer_copy btn green\">
        <img src='$src' style='max-width:{$width}px;max-height:{$height}px' data-copy = '$src_to_copy' class='img img-thumbnail' />
    </span>
</div>
";
        })->implode('&nbsp;');
    }
}
