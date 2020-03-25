# Application startup

```
git clone github.com/wikyburns/MachineVending.git
cd MachineVending
cd docker
docker-compose up
```

Postman Public Collection

https://www.getpostman.com/collections/31c132c6866bd182d432

Run Tests

Windows
```
docker run -v %cd%/app --rm phpunit/phpunit tests
```

Ubuntu/Mac:
```
docker run -v $(pwd)/app --rm phpunit/phpunit tests
```