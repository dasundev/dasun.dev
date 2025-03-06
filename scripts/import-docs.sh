#!/bin/bash

set -e

repository="$1"
directory="$2"

# Copy docs to the root level of the repository
copy_docs() {
    cp -r docs/* .
    rm -rf docs
}

if [[ -z "$repository" || -z "$directory" ]]; then
    echo "Error: Missing required argument."
    exit 1
fi

repo_dir="storage/app/docs/$directory"

mkdir -p "$repo_dir"
cd "$repo_dir" || { echo "Failed to enter directory: $repo_dir"; exit 1; }

if [[ ! -d ".git" ]]; then
    git init
    git remote add origin "https://github.com/$repository.git"
    git sparse-checkout init --no-cone
    git sparse-checkout set docs
    git pull origin main
    copy_docs
else
    git pull origin main
    if [[ -d "docs" ]]; then
        copy_docs
    fi
fi
