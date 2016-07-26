<?php

namespace Recca0120\Upload;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class Api
{
    /**
     * $request.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * $name.
     *
     * @var string
     */
    protected $name;

    /**
     * __construct.
     *
     * @method __construct
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request $request
=======
     * @param \Illuminate\Http\Request $request
>>>>>>> develop
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * setName.
     *
     * @method setName
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * getFile.
     *
     * @method getFile
     *
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getFile()
    {
        return $this->request->file($this->name);
    }

    /**
     * getPartialName.
     *
     * @method getPartialName
     *
     * @return string
     */
    public function getPartialName()
    {
        $originalName = $this->getOriginalName();
        $extension = $this->getExtension($originalName);
        $token = $this->request->get('token');

        return md5($originalName.$token).$extension;
    }

    /**
     * getExtension.
     *
     * @method getExtension
     *
     * @param string $name
     *
     * @return string
     */
    public function getExtension($name)
    {
        $extension = null;
        if (($pos = strrpos($name, '.')) !== -1) {
            $extension = '.'.substr($name, $pos + 1);
        }

        return $extension;
    }

    /**
     * replaceResponse.
     *
     * @method replaceResponse
     *
<<<<<<< HEAD
     * @param  \Symfony\Component\HttpFoundation\Response $response
=======
     * @param \Symfony\Component\HttpFoundation\Response $response
>>>>>>> develop
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function replaceResponse(Response $response)
    {
        return $response;
    }

    /**
     * getOriginalName.
     *
     * @method getOriginalName
     *
     * @return string
     */
    abstract public function getOriginalName();

    /**
     * getStartOffset.
     *
     * @method getStartOffset
     *
     * @return int
     */
    abstract public function getStartOffset();

    /**
     * hasChunks.
     *
     * @method hasChunks
     *
     * @return bool
     */
    abstract public function hasChunks();

    /**
     * isCompleted.
     *
     * @method isCompleted
     *
     * @return bool
     */
    abstract public function isCompleted();

    /**
     * getMimeType.
     *
     * @method getMimeType
     *
     * @return string
     */
    abstract public function getMimeType();

    /**
     * getResourceName.
     *
     * @method getResourceName
     *
     * @return string
     */
    abstract public function getResourceName();
}