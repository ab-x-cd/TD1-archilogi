FROM ubuntu:latest
LABEL authors="natt"

ENTRYPOINT ["top", "-b"]