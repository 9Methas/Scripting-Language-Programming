const http = require('http');
const url = require('url');
const querystring = require('querystring');

const server = http.createServer((req, res) => {
  const parsedUrl = url.parse(req.url, true);
  res.writeHead(200, { 'Content-Type': 'text/html' });
  
  res.write(`<p>${parsedUrl.pathname}</p>`);
  
  const query = parsedUrl.query;
  for (let key in query) {
    res.write(`<p>${key}: ${query[key]}</p>`);
  }
  
  res.end();
});

server.listen(3333, () => {
});
