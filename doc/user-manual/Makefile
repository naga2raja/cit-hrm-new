# Makefile for Sphinx documentation
#

# You can set these variables from the command line.
SOURCEDIR     = source
SPHINXOPTS    =
SPHINXBUILD   = sphinx-build
SPHINXAPIDOC  = sphinx-apidoc
PAPER         = a4
PDFBUILDDIR		= pdf/_build
HTMLBUILDDIR	=	build
PROJECT_NAME  = CIT-HRM
DRIVE_FOLDER  = 
PDF_SCRIPT		=	pdfScript
clean:
	rm -rf build/
	rm -rf pdf/
	rm -rf __pycache__/
	rm -rf html
	rm CIT-HRM.pdf

.PHONY: help clean Makefile

# Catch-all target: route all unknown targets to Sphinx using the new
# "make mode" option.  $(O) is meant as a shortcut for $(SPHINXOPTS).
%: Makefile
	@$(SPHINXBUILD) -M $@ "$(SOURCEDIR)" "$(PDFBUILDDIR)" $(SPHINXOPTS) $(O)

pdf:
	mkdir pdf
	cp $(SOURCEDIR)/*.rst pdf/
	cp $(PDF_SCRIPT)/conf.py pdf/conf.py
	cp -r $(SOURCEDIR)/images/ pdf/images/
	cp $(PDF_SCRIPT)/Makefile pdf/Makefile
	pwd
	$(MAKE) -C pdf pdf
	rm -rf pdf/
	rm -rf __pycache__/

html:
	@$(SPHINXBUILD) -M $@ "$(SOURCEDIR)" "$(HTMLBUILDDIR)" $(SPHINXOPTS) $(O)
	mv $(HTMLBUILDDIR)/html html/
	rm -rf $(HTMLBUILDDIR)/

install:
	$(shell ./setup.sh)