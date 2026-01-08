<?php

namespace App;

class Request
{

    public function url(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        if (($pos = strpos($path, '?')) !== false) {
            $path = substr($path, 0, $pos);
        }
        return $path === '/' ? $path : rtrim($path, '/');
    }
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getHttpVersion(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }
    public function getQueryString()
    {
        return $_SERVER['QUERY_STRING'];
    }
    public function getHost(): ?string
    {
        return $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'];
    }
    public function getContentType(): ?string
    {
        $headers = getallheaders();
        return $headers['Content-Type'] ?? null;
    }
    public function isJson()
    {
        $type = $this->getContentType();
        return (($type !== null) && str_contains(strtolower($type), 'application/json'));
    }
    public function getAccept(): ?string
    {
        $headers = getallheaders();
        return $headers['Accept'] ?? null;
    }

    public function getAcceptLanguage(): ?string
    {
        $headers = getallheaders();
        return $headers['Accept-Language'] ?? null;
    }

    public function getUserAgent(): ?string
    {
        $headers = getallheaders();
        return $headers['User-Agent'] ?? null;
    }

    public function getReferer(): ?string
    {
        $headers = getallheaders();
        return $headers['Referer'] ?? null;
    }

    public function getOrigin(): ?string
    {
        $headers = getallheaders();
        return $headers['Origin'] ?? null;
    }

    public function getAcceptEncoding(): ?string
    {
        $headers = getallheaders();
        return $headers['Accept-Encoding'] ?? null;
    }

    public function getConnection(): ?string
    {
        $headers = getallheaders();
        return $headers['Connection'] ?? null;
    }
    public function getCacheControl(): ?string
    {
        $headers = getallheaders();
        return $headers['Cache-Control'] ?? null;
    }
    public function getDNT(): ?string
    {
        $headers = getallheaders();
        return $headers['DNT'] ?? null;
    }

    public function getHeader(string $name): ?string
    {
        $headers = getallheaders();
        $name = str_replace(' ', '-', ucwords(str_replace('-', ' ', strtolower($name))));
        return $headers[$name] ?? null;
    }
    public function isAjax()
    {
        $type = $this->getHeader('X-Requested-With');
        return (($type !== null) && str_contains(strtolower($type), 'xmlhttprequest'));
    }
    public function getBearerToken(): ?string
    {
        $auth = $this->getHeader('Authorization');
        if ($auth === null || !str_starts_with($auth, 'Bearer ')) {
            return null;
        }
        return trim(substr($auth, 7));
    }
    public function isGET(): bool
    {
        return $this->method() === 'get';
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }
    public function all(): ?array
    {
        $data = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        if ($this->isJson()) {
            $raw = file_get_contents('php://input');
            $json = json_decode($raw, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
                foreach ($json as $key => $value)
                    $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        return $data;
    }
    public function get(string $key)
    {
        $data = $this->all();
        if (array_key_exists($key, $data)) {
            return $data[$key];
        }
        return null;
    }
    public function allFiles(): ?array
    {
        $files = [];

        $processFiles = function () use (&$files) {
            if (empty($_FILES)) {
                return;
            }

            foreach ($_FILES as $key => $value) {
                if (is_array($value['error'])) {
                    if ($value['error'][0] === UPLOAD_ERR_OK) {
                        $files[$key] = $value;
                    }
                } else {
                    if ($value['error'] === UPLOAD_ERR_OK) {
                        $files[$key] = $value;
                    }
                }
            }
        };

        $processFiles();

        return $files;
    }
    public function file(string $key): ?array
    {
        if (!isset($_FILES[$key])) {
            return null;
        }

        if ($_FILES[$key]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        return $_FILES[$key];
    }
    public function hasFile(string $key): bool
    {
        return isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK;
    }
}
