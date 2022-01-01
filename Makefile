
.PHONY: help
.DEFAULT_GOAL := help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Initial installation
	@bash scripts/install.sh

ash: ## Attach shell to container
	@bash scripts/ash.sh

up: ## Start all containers
	@docker-compose up -d

down: ## Stop all containers
	@docker-compose down

ps: ## Container status
	@docker-compose ps