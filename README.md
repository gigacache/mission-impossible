
## Mission Impossible

A Symfony cli tool to quickly and efficiently track `missions` from a `json file`. Built for a custom `event-driven` middleware system.

## Installation

Add to Bash profile
```
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

Get All Missions In Project
```
get::missions
```
Get missions triggered by this mission
```
get::missions:next <mission name>
```
Get missions that triggered this mission
```
get::missions:prev <mission name>
```