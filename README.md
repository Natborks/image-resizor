# Dockerised MicroService for Image Upload and Resizing.
Takes image in parameters, and resizes.

### Prerequisites
A Web Browser and Internet Access.

## How to Use

### Method ```GET```
Url: https://imageresize.microapi.dev/v1/download{filename}
Makes file available for download at the specified url
Description: This endpoint makes the resized image available for download at the specified url

### Method ```POST```
Url: https://imageresize.microapi.dev/#v1/upload
payload:
{
 ```image```: “file”,
 ```width```: 0,
 ```height```: 0,
}
Description: This endpoint takes an image in parameters, and resizes according to the height and width provided. Note that the image should not be more than 2mb, and the width and height parameters should be between 0 and 10001.

## Built With
* [Laravel] - PHP Framework

## Authors
**Team Thanos**

## Acknowledgments
HNGi7 Team
