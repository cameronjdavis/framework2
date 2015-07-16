<?php
$queryString = $router->generate(ExampleRoutes::QUERY_STRING) . '&stringVal=FatCat&intVal=765&boolVal=1&arrayVal[]=abc&arrayVal[]=def';
$routeParams = $router->generate(ExampleRoutes::ROUTE_PARAMS, ['intParam' => 55, 'param2' => 'another_value']);
$deleteRoute = $router->generate(ExampleRestfulRoutes::DELETE, [Framework2\Rest\ExampleRestfulHelper::ID => 44]);
$createRoute = $router->generate(ExampleRestfulRoutes::CREATE) . '&' . Framework2\Rest\ExampleRestfulHelper::PROP_1 . '=example prop1 value';
$getRoute = $router->generate(ExampleRestfulRoutes::GET, [Framework2\Rest\ExampleRestfulHelper::ID => 123]);
?>
<h1>Framework2 Quick Start Guide</h1>

<p>
<ul>
    <li>Query string processing <a href="?r=<?= $queryString ?>"><em><?= $queryString ?></em></a>
    </li>
    <li>Route parameters <a href="?r=<?= $routeParams ?>"><?= $routeParams ?></a></li>
    <li><a href="?r=<?= $router->generate(ExampleRoutes::APP_CONFIG) ?>">Application config</a></li>

    <li> Restful controller examples
        <ul>
            <li><a href="?r=<?= $deleteRoute ?>">Delete</a></li>
            <li><a href="?r=<?= $createRoute ?>">Create</a></li>
            <li><a href="?r=<?= $getRoute ?>">Get</a></li>
        </ul>
    </li>
</ul>
</p>