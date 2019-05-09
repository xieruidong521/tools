<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunPhpRequest extends FormRequest
{
    public $filename='';
    public $url='http://192.168.0.69:8087/';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'run' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'run.required' =>'代码不能为空',
        ];
    }
    public function makeFilename()
    {
        $this->filename=str_random(20).'.php';
    }
    public function makeFile()
    {
        return "<?php ini_set('disable_functions',
        'passthru,
        exec,
        assert,
        system,
        chroot,
        chgrp,
        chown,
        shell_exec,
        proc_open,
        ini_restore,
        dl,readlink,
        symlink,
        popen,
        stream_socket_server,
        pfsockopen,
        putenv,
        file_put_contents,
        fopen,
        fwrite,
        phpinfo,
        include,
        require,
        require_once,
        include_once
        '); ?>".$this->run;
    }
}
