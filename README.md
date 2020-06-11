# Dockerised MicroService for Image Upload and Resizing.
Takes image in parameters, and resizes. Height and width should be between 1 and 1000.

### Prerequisites
A Web Browser and Internet Access.
## How to Use
### Method ```GET```
Url: https://baseurl/api/dowload{filename}
File is made available for download at the specified url
### Method ```POST```
Url: https://baseurl/api/upload
payload:
{
 ```image```: “file”,
 ```width```: 0,
 ```height```: 0,
}
## Built With
* [Laravel] - PHP Framework

## Authors
**Team Thanos**

## Acknowledgments
HNGi7 Team
