<?php
    $queryString = $router->generate(Routes::QUERY_STRING) . '&stringVal=FatCat&intVal=765&boolVal=1&arrayVal[]=abc&arrayVal[]=def';
    $routeParams = $router->generate(Routes::ROUTE_PARAMS, ['intParam' => 55, 'param2' => 'another_value']);
?>
<h1>Framework2 Quick Start Guide</h1>

<p>
    <ul>
        <li>Query string processing <a href="?r=<?= $queryString ?>"><em><?= $queryString ?></em></a>
        </li>
        <li>Route parameters <a href="?r=<?= $routeParams ?>"><?= $routeParams ?></a></li>
        <li>Application config</li>
        <li>Config for development environments</li>
    </ul>
</p>