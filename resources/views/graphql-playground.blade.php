<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GraphQL Playground</title>
    <link rel="shortcut icon" href="https://graphql-playground.com/favicon.png" />
    <style>
        html, body, #root {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div id="root"></div>
    <script src="https://cdn.jsdelivr.net/npm/graphql-playground-react/build/static/js/middleware.js"></script>
    <script>
        window.addEventListener('load', function () {
            GraphQLPlayground.init(document.getElementById('root'), {
                endpoint: '/graphql', // Ensure this matches your GraphQL endpoint
                query: '{ users { id name } }'
            });
        });
    </script>
</body>
</html>
