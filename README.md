folder-gallery
==============

A simple Bootstrap-styled gallery. Licensed under [Apache 2.0](http://www.apache.org/licenses/LICENSE-2.0)

How Does It Work
================

In the same folder as folder-gallery.php, create a folder called "gallery". In this gallery folder, create a folder for each gallery you would like, and place your desired pictures inside the folder. Each folder will be it's own gallery. Additionally, a default gallery, called "latest" needs to be created. When a user arrives at your page, they will initially see the "latest" gallery.

Download and Example
====================

The code and an example can be found in folder-gallery.php

Known Issues
============

Images with spaces in their names will break this script. I'm going to look into it. It seems PHP's urlencode() and rawurlencode() are not what I need to use to encode image path's because they encode the slashes too. I should probably just use str_replace to remove the paths, then rebuild the image paths.

Credits/Thanks
==============

[Design Packs](http://designpacks.com/), *for the test gallery images*.
