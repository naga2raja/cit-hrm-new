# CIT HRM user manual

This is a repo for CIT HRM user manual. Sphinx documentation tools and sphinx business theme used.

## Tools used

[Shinx](https://www.sphinx-doc.org)

[Sphinx business theme](https://github.com/Nekmo/sphinx-business-theme)

[sphinx rtd theme]

## Virtual environment
Install virtualenv using pip3:
```bash
pip3 install virtualenv
```
Install virtualenv using apt:
```bash
apt install virtualenv
```
Create virtual environment:
```bash
virtualenv <virtualEnvName>
```
Activate virtual environment:
```bash
source <virtualEnvName>/bin/activate
```
## Installation

Run setup.sh to install required packages
```bash
sh setup.sh
```

## Sphinx

Install Sphinx using pip3

```bash
pip3 install -U Sphinx
```
Clone the project:
```bash
git clone https://github.com/naga2raja/cit-hrm-new
```

cd to project directory:
```bash
cd cit-hrm-new/doc/user-manual/
```
## Generate User manual

To clean temporary directories and files
```bash
make clean
```

To generate pdf document:
```bash
make pdf
```
PDF document will be generated and copied in the current directory.

To generate html:
```bash
make html
```
HTML files for the user manual will be generated into the html directory.

