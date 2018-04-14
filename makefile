# Copied from https://github.com/ckressibucher/php-project-makefile

# defines variables
include Make.config

# finds all php files in a given directory
macro_find_phpfiles = $(shell find $(1) -type f -name "*.php")

# finds all php sources in SRCS directories
src = $(foreach d,$(SRCS),$(call macro_find_phpfiles,$(d)))

# run all tests
.PHONY: test
test: setup phpunit

.PHONY: list
list:
	@echo ""
	@echo "Useful targets:"
	@echo ""
	@echo "  test          > run linter and tests (default target)"
	@echo ""
	@echo "  setup         > install dependencies"
	@echo "  deps_update   > explicitly update dependencies"
	@echo ""
	@echo "  server_start  > start dev server"
	@echo "  server_stop   > stop dev server"


.PHONY: clean
clean: clean_tmp clean_vendor

.PHONY: clean_tmp
clean_tmp: server_stop
	test ! -e "$(TMP_DIR)" || rm -r "$(TMP_DIR)"

.PHONY: clean_vendor
clean_vendor:
	test ! -e vendor || rm -r vendor

.PHONY: setup
setup: vendor/autoload.php node_modules .env

# task to explicitly update the dependencies
.PHONY: deps_update
deps_update:
	$(COMPOSER_BIN) update

# test project
.PHONY: phpunit
phpunit:
	./vendor/bin/phpunit

$(TMP_DIR)/phplint: $(TMP_DIR) $(src)
	@echo lint source files...
	@$(foreach f,$(filter-out $(TMP_DIR),$?),$(PHP_BIN) -l $(f);)
	touch $@

# we only do `install`, as composer.json may change
# without wanting to update dependencies.
# Please check the composer warning of out-of-sync
# packages.
composer.lock: composer.json
	$(COMPOSER_BIN) install
	touch $@

# make sure deps get installed even if
# composer.lock exists initially (or
# after `git pull`)
vendor/autoload.php: composer.lock
	$(COMPOSER_BIN) install
	touch $@


# Make sure yarn installs
node_modules:
	$(YARN_BIN)

# Make sure yarn installs
.env:
	cp .env.dist .env


.PHONY: run
run: setup stop $(TMP_DIR)/server.PID

.PHONY: stop
stop:
	test ! -e $(TMP_DIR)/server.PID || { kill `cat $(TMP_DIR)/server.PID`; rm $(TMP_DIR)/server.PID; }

# starts the server, redirect stdout/stderr to log files in TMP_DIR,
# and writes the process id to the target file
# Note: If TMP_DIR does not yet exist, we create it manually instead
# of declaring a dependency of it. The reason is that we don't want
# to run this rule if the server is already started, but the TMP_DIR's
# timestamp has been modified
$(TMP_DIR)/server.PID:
	mkdir -p $(TMP_DIR)
	$(PHP_BIN) -S $(DEV_SERVER_ADDR) -t $(PUBLIC_DIR) bin/server.php >$(TMP_DIR)/server.log 2>$(TMP_DIR)/server.err.log & echo $$! > $@;

$(TMP_DIR):
	mkdir -p $@
