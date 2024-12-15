<?php

namespace Core\Application;

enum StatusCode: int
{
    case OK = 200;
    case Bad_Request = 400;
    case Unauthorized = 401;
    case Page_Not_Found = 404;
    case Server_Error = 500;
}