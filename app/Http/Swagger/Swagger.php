<?php

namespace App\Http\Swagger;

use OpenApi\Annotations as OA;


/**
 * @OA\Server(url=L5_SWAGGER_CONST_HOST),
 * @OA\Info(
 *     title="Expense Tracker API",
 *     version="1.0.0",
 *     description="API for managing personal expenses with authentication via Laravel Sanctum.",
 *     @OA\Contact(
 *         email="owner@exemplo.com",
 *         name="Owner"
 *     )
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     securityScheme="bearerAuth",
 * )
 */
class Swagger
{
    /**
     * @OA\Tag(
     *   name="Auth",
     *   description="Access the system."
     * ),
     * */


    /**
     * @OA\Tag(
     *   name="Expenses",
     *   description="Methods for Expenses."
     * ),
     * */

}
