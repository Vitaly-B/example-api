<p align="center">
    <h1 align="center">Yii 2 Basic REST API Example</h1>
    <br>
</p>

DIRECTORY STRUCTURE
-------------------

      .docker/            contains docker configuration files
      config/             contains application configurations
      controllers/        contains Web controller classes
      runtime/            contains files generated during runtime
      src/                contains source of application
      tests/              contains various tests
      web/                contains the entry script and Web resources

REQUIREMENTS
------------

The minimum requirement PHP >=8.3.8

Docker version 27.3.1, build ce12230

Docker Compose version v2.29.7

INSTALLATION
------------

### Install via GIT

<h5>1. Clone project repository</h5>

```
git clone git@github.com:Vitaly-B/example-api.git example-api
```

<h5>2. Build docker containers</h5>

```
cd  example-api
```

```
docker-compose up -d --build
```

<h5>3.Call API POST /api/sum-even</h5>
```
curl --location 'http://localhost:8000/api/sum-even' \
--header 'Content-Type: application/json' \
--header 'Cookie: XDEBUG_SESSION=XDEBUG_ECLIPSE' \
--data '{
    "numbers": [1,2,3,4]
}'
```

### API Documentation

```
src/Example/Ports/Http/docs/openapi.yaml
```

TESTING
-------

<h5>Run PHPUnit tests</h5>

```
make test
```
