<?php


class authMiddleware extends \Slim\Middleware
{
    /**
     * Call
     *
     * Perform actions specific to this middleware and optionally
     * call the next downstream middleware.
     */
    public function call()
    {
        $app = $this->app;
        $currentRoute = $this->app->request()->getPathInfo();
        $isAuthorized = function () use ($app, $currentRoute) {
            if ($currentRoute == "/membre") {
                if ($app->getCookie("user")) {
                } else {
                    flash::setFlash('session', "Vous devez être connecté pour acceder à cette page !");
                    $app->redirect('connexion');
                }
            }
        };

        $app->hook('slim.before.dispatch', $isAuthorized);
        $app->call();
    }
}