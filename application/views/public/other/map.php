<!DOCTYPE html>
<!-- Full page map -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('/assets/images/plane.png')?>">
    <title>Nashik Tourism &mdash; Map</title>

<style>
    #map{
    width:100%;
    height:100%;
    margin:0;
    padding:0;
    position:absolute;
}

#map iframe{
    margin: auto;
}
</style>

</head>
<body>
    <div id="map">
    <iframe src="https://www.google.com/maps/d/embed?mid=1f5HjAtiHG-tvu9ctnXuZ4HTd63hxo0fl" height="100%" width="99%"></iframe>
    </div>
    </body>
</html>
