# Framework PHP

Documentation, le framework utilisera la notion de Container.

Ce travail se fera par équipe de 2/2.

Vous devez expliciter votre démarche pour construire votre Framework.

- Choix des techniques retenues, par exemple Twig pour le templating

- Disptacher pour servir les réponses au client.

... 

Essayez de bugeter le temps que cela vous prendrais pour tout réaliser. 

Passez à l'implémentation de votre idée.

Construisez une campagne de tests (unitaires) qui validera votre approche. Planifiez cette campagne dans votre readme.md

Documentez votre Framework pour qu'un développeur qui choisit votre solution technique, puisse l'utiliser.

Vous pouvez vous inspirer du Framework SF ou de celui de votre formateur :

https://github.com/Antoine07/myFramework

```php
$container = new Services\Container;

$container['engine'] = function($c){
    return new Engine;
};
```

Dans ce dernier vous implémenterez la notion de service statique (une seule instance).

```php
$container['model'] = $container->asShared(function ($c) {
    return new Model($c['connection']);
});

```

Installation
------------

On pourra installer notre Framework à l'aide de la commande CLI composer suivante 

```
    composer require myframework/myframework

```
Mais on pourra également le télécharger comme suit :

```
    $ git clone https://github.com/Antoine07/myFramework
```
## Initialize

## Routing configuration

La gestion des routes se fera comme suit dans le framework :

```php

$container['routes'] = Yaml::parse( __DIR__ . '/routes.yaml');

$container['router'] = function ($c) {
    $router = new Router;
    foreach ($c['routes'] as $route) {
        $router->addRoute(new Route($route));
    }

    return $router;
};

```
### Basic routing

```yaml

BlogController_index:
    pattern:   \/
    connect:  Controllers\BlogController:index

```

### Route parameters

Pour définir des routes paramètriques vous mettez en place une stratégie avec les regex suivantes.

```yaml

BlogController_show:
    pattern:   \/post\/(?P<id>[1-9][0-9]*)
    connect:  Controllers\BlogController:show
    params: id

```

```yaml

CategoryController_show:
    pattern:   \/cat\/[a-zA-Z0-9\-_]+\/(?P<cat_id>[1-9][0-9]*)\/(?P<user_id>[1-9][0-9]*)
    connect:  Controllers\CategoryController:show
    params: cat_id, user_id
```

Les routes seront chargées dans le service container.

```php

$container['routes'] = $routes;

```

### RESTful Resource (facultatif)

Si vous avez le temps vous mettez en place des routes Restful

```
StudentController:
    resource: \/student
    connect: Controllers\StudentController
    action: '*'

```
Actions handled by resources Controller

Verb          | Path                | Action
------------- | -------------       | ---------
GET           | /student            | index
GET           | /student/create     | create
POST          | /student            | store
GET           | /student/{id}       | show
PUT/PATCH     | /student/{id}/edit  | update
DELETE        | /student/{id}       | destroy


Puis les verbes seront traités de la manière suivante :

```php
// PUT/PATCH
$_POST['_method']='PUT';  //  $_POST['_method'] = 'PATH';

// DELETE
$_POST['_method'] = 'DELETE';

```

### Model

Libre à vous d'implémenter le modèle sque vous souhaitez.

```php

$Post = $this->pdo->setObject('Models\\Post');
$Post->id = 1;
$Post->title = 'hello world';
$Post->save();

$posts = $Post->all();

```

### Template


#### Defining a layout

Un système de layout sera mis en place et accessible dans le dossier suivant à la racine de votre application : **resources/views/layouts**

```php

 protected $layout = 'layouts.master';

```

Vous pouvez définir dans la classe vue un layaout partiel (facultatif)

```php

$this->view->setRender('layouts.partials.header', []);

```

```php

{{$header}}
<body>
<div class="header-container">
    <header class="wrapper clearfix">
        <h1 class="title"><a href="{{url('/')}}">{{$title}}</a></h1>
        {{$menu}}
    </header>
</div>
{{$content}}
<!-- #main -->
</div> <!-- #main-container -->
<div class="footer-container">
    <footer class="wrapper">
        <h3>footer</h3>
    </footer>
</div>
{{$footer}}
</body>
</html>

```
### define a child page

```php

<h2>main contain</h2>
@if(isset($posts))
<ul>
    @foreach($posts as $post)
    <li><h2><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h2>
        id: {{$post->id}}</li>
    @endforeach
</ul>
@endif

```

