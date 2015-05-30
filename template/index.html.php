<?php
    $queryString = $router->generate(Routes::QUERY_STRING) . '&stringVal=FatCat&intVal=765&boolVal=1&arrayVal[]=abc&arrayVal[]=def&intArrayVal[]=321&intArrayVal[]=654';
?>
<h1>Framework2</h1>
<h2>Example Usages</h2>
<p>
    <ul>
        <li>Query string processing <a href="?r=<?= $queryString ?>">
                <br><em><?= $queryString ?></em></a>
        </li>
        <li>Route parameters</li>
        <li>Application config</li>
        <li>Config for development environments</li>
    </ul>
</p>