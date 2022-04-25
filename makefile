THIS_FILE:=$(lastword $(MAKEFILE_LIST))
.PHONY: help build up start down destroy stop restart logs ps console
build:
	docker-compose  build $(c)
up:
	docker-compose  up -d $(c)
start:
	docker-compose  start $(c)
down:
	docker-compose  down $(c)
destroy:
	docker-compose  down -v $(c)
stop:
	docker-compose  stop $(c)
restart:
	docker-compose  stop $(c)
	docker-compose  up -d $(c)
logs:
	docker-compose  logs --tail=100 -f $(c)
ps:
	docker-compose  ps
console:
	docker-compose  exec web bash