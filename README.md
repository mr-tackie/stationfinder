# Station Finder
An API that provides police station information in Ghana.

## Introduction
This project was inspired by a challenge I encountered when I was working on a biometric attendance application for a security company. The client wanted a way by which their guards could alert the closest police station in case of an emergency. Unforutnately, there was no open API that was available to collect this data from. So I developed a web scraper to get a list of the police stations available on the Ghana police website (https://police.gov.gh). I then decided to use the information I got to create this API to allow other developers create apps that can provide this feature. 

## Features
1. Listing the nearest police stations to a given geographical position
2. Listing all police stations by region 


## Notes
1. This project is still in it's infancy so there are a lot of inconsistencies with regards to the data that is available (duplicates, wrong locations etc.)
2. I used data that was scraped from the Ghana Police website and currently, there are only 298 stations in the database(including duplicates). The plan is to develop an app to gather crowd sourced data.
