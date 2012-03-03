
DOC=doc-md

build:
	pdflatex ${DOC}.tex

run:build
	okular ${DOC}.pdf

clean:
	find . -name '*~' -exec rm -rf '{}' \;
	rm -rf *.aux
	rm -rf *.log
	rm -rf *.toc
	rm -rf *.out
	rm -rf *.lof

clean-all:clean
	rm -rf *.pdf
