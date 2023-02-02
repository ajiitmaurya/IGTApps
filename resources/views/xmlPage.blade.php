<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XML Page</title>
    @include('requireBootstrapFiles')
</head>
<body class="banner-area">
    <section style="margin:30px;text-align:-webkit-center;">
        <div class="form-group">
            <h2 for="exampleFormControlTextarea1">XML Data</h2>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
                {{$xml_string}}
            </urlset>
        </div>
        <button class="btn btn-primary" id="xml_to_json" type="button">Click to convert into Json</button>
        <h2 for="exampleFormControlTextarea1" id="json_header" style="margin-top: 20px;">Json Formatted Data</h2>
        <div id="json" style="margin:30px;text-align:-webkit-center;">
        </div>
        <button class="btn btn-primary" id="json-store" type="button" disabled>Click to Store In Database</button>
        <h2 for="exampleFormControlTextarea1" id="fetch_header" style="margin-top: 20px;">Fetched Data From Database</h2>
        <div id="array" style="margin:30px;text-align:-webkit-center;">
        </div>

        <button class="btn btn-danger" id="json-delete" type="button">Click to delete Stored from Database Only</button>
    </section>
</body>

</html>