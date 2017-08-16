# TYPO3 Extension ``frd_Inline_Relation_Bug`` 

> Proof of Concept for an Inline Relation Bug

## Bug

1. the System Fetch all Entities on System (under the same PID)
2. the System Execute Bug 1. N times (N is the number of Entities in RootEntity)

The Bug Logic is: [numberOfStoresInCity] * [numberOfStoresOnSystem] + [numberOfStoresInCity] = [absoluteMethodCalls]


## Usage


### 1) Installation

#### Installation using Composer

The recommended way to install the extension is by using (Composer)
add in your Composer: 
```
"repositories": [
    ...
    {"type": "vcs", "url": "git@github.com:brannow/frd_inline_relation_bug.git"}
  ]
```

```
"require": {
    "frd/frd-inline-relation-bug": "dev-master"
  }
```

 ...or just clone this source code into your Typo3conf/ext folder

### 2) Manual

1) Activate the Extension (if not already).
2) Apply the sql dump ``` inline_bug_2017-08-16.sql ``` into your Database (it contains Sample Store and City data).
2.1) Alter the  ``` pid ``` (default pid: 2) of in the ``` tx_frdinlinerelationbug_domain_model_city ``` and ``` tx_frdinlinerelationbug_domain_model_store ```
3) Select 'LIST' on the left typo3 menu in Backend
4) navigate to the records (records are into your chosen pid)
5) the userFunc class ``` EntityTitleUserFunc ``` writes every call a log file into the tempDirectory

## Magic

you can see in the logs how many times every record are processed.
if u edit a Store u can see every store (we have 400 at all) is called 20 times. that means we want to edit 1 of the 20 Cities, 
which contains 20 Stores, TYPO3 load not only every Store on the entire System, it will load every store multiple times. in my Case 8020 Method calls!

keep in mind we only edit 1 city with 20 stores, this result in 8020 method calls.