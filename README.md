
## Mission Impossible

A Symfony cli tool to quickly and efficiently track `missions` from a `json file`. Built for a custom `event-driven` middleware system.

## Installation

Add to Bash profile
```
cd ~
git clone https://github.com/gigacache/mission-impossible.git .mission-impossible
cd ~/.mission-impossible
composer update
export PATH=~/.mission-impossible:$PATH
source ~/.bash_profile
```

Install composer
```
make install
```

Run unit tests
```
make run-tests
```

## Commands

Get missions in project by environment
```
 ./mi get::missions <environment optional, default all> 
```
Get missions triggered by this mission
```
./mi get::missions:next <mission name>
```
Get missions that triggered this mission
```
./mi get::missions:prev <mission name>
```
Get missions by status
```
./mi get::missions:enabled 
```