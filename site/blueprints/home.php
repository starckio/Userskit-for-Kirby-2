<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: true
files:
  sortable: true
  fields:
    caption:
      label: Caption
      type: textarea
fields:
  title:
    label: Page
    type:  text
  subtitle:
    label: Title
    type:  text
  cover:
    label: Cover Image
    type:  selector
    mode:  single
    types:
        - image