<?php
$queryString = $router->generate(ExampleRoutes::QUERY_STRING) . '&stringVal=FatCat&intVal=765&boolVal=1&arrayVal[]=abc&arrayVal[]=def';
$routeParams = $router->generate(ExampleRoutes::ROUTE_PARAMS, ['intParam' => 55, 'param2' => 'another_value']);
?>
<h1>Framework2 Quick Start Guide</h1>

<p>
<ul>
    <li>Query string processing <a href="?r=<?= $queryString ?>"><em><?= $queryString ?></em></a>
    </li>
    <li>Route parameters <a href="?r=<?= $routeParams ?>"><?= $routeParams ?></a></li>
    <li><a href="?r=<?= $router->generate(ExampleRoutes::APP_CONFIG) ?>">Application config</a></li>
</ul>
</p>