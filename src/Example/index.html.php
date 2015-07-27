<?php
$queryString = $router->generate(ExampleRoutes::QUERY_STRING) . '&stringVal=FatCat&intVal=765&boolVal=1&arrayVal[]=abc&arrayVal[]=def';
$routeParams = $router->generate(ExampleRoutes::ROUTE_PARAMS, ['intParam' => 55, 'param2' => 'another_value']);
$deleteRoute = $router->generate(ExampleRestfulRoutes::DELETE, [Framework2\Example\ExampleRestfulHelper::ID => 44]);
$createRoute = $router->generate(ExampleRestfulRoutes::CREATE);
$getRoute = $router->generate(ExampleRestfulRoutes::GET, [Framework2\Example\ExampleRestfulHelper::ID => 123]);
$getNonRoute = $router->generate(ExampleRestfulRoutes::GET, [Framework2\Example\ExampleRestfulHelper::ID => 666]);
$getMultiple = $router->generate(ExampleRestfulRoutes::GET_MULTIPLE);
$updateRoute = $router->generate(ExampleRestfulRoutes::UPDATE, [Framework2\Example\ExampleRestfulHelper::ID => 123]);
?>
<h1>Framework2 Quick Start Guide</h1>

<ul>
    <li>Query string processing <a href="?r=<?= $queryString ?>"><em><?= $queryString ?></em></a></li>
    <li>Route parameters <a href="?r=<?= $routeParams ?>"><?= $routeParams ?></a></li>
    <li><a href="?r=<?= $router->generate(ExampleRoutes::APP_CONFIG) ?>">Application config</a></li>
    <li>Restful controller examples.<br>
        Username <strong><?= \Framework2\Example\ExampleAuthentication::USERNAME ?></strong><br>
        Password <strong><?= \Framework2\Example\ExampleAuthentication::PASSWORD ?></strong>
        <ul>
            <li><a href="?r=<?= $deleteRoute ?>">Delete via GET</a></li>
            <li>
                <form action="?r=<?= $createRoute ?>" method="POST">
                    <input name="<?= Framework2\Example\ExampleRestfulHelper::PROP_1 ?>" value="example prop1 value">
                    <input type="submit" value="Create via POST">
                </form>
            </li>
            <li><a href="?r=<?= $getRoute ?>">Get via GET</a></li>
            <li><a href="?r=<?= $getNonRoute ?>">Get non-existent resource</a></li>
            <li><a href="?r=<?= $getMultiple ?>">Get multiple via GET</a></li>
            <li>
                <form action="?r=<?= $updateRoute ?>" method="POST">
                    <input name="<?= Framework2\Example\ExampleRestfulHelper::PROP_1 ?>" value="updated value">
                    <input type="submit" value="Update via POST">
                </form>
            </li>
            <li>
                <form action="?r=<?= $createRoute ?>" method="POST">
                    <input name="<?= Framework2\Example\ExampleRestfulHelper::PROP_1 ?>" value="bad value">
                    <input type="submit" value="Bad input causes error">
                </form>
            </li>
            <li><a href="?r=<?= $getRoute ?>&<?= Framework2\Rest\JsonResponder::ENVELOPE ?>=1">Respond with JSON envelope</a></li>
            <li>
                <form action="?r=<?= $createRoute ?>&<?= Framework2\Rest\JsonResponder::ENVELOPE ?>=1" method="POST">
                    <input name="<?= Framework2\Example\ExampleRestfulHelper::PROP_1 ?>" value="bad value">
                    <input type="submit" value="Error with JSON envelope">
                </form>
            </li>
        </ul>
    </li>
</ul>
