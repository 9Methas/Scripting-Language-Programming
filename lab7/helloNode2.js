const http = require('http');
const url = require('url');
const fs = require('fs'); 

const server = http.createServer((req, res) => {
  const parsedUrl = url.parse(req.url, true);
  
  if (parsedUrl.pathname === '/favicon.ico') {
    res.writeHead(204); 
    res.end();
    return;
  }
  
  res.writeHead(200, { 'Content-Type': 'text/html' });
  
  let output = '';
  const query = parsedUrl.query;
  if (query.name) {
    output += `<p>name: ${query.name}</p>`;
  }
  if (query.subject) {
    output += `<p>subject: ${query.subject}</p>`;
  }
  if (query.score) {
    output += `<p>score: ${query.score}</p>`;
  }
  res.write(output);

  fs.writeFile('hello.htm', output, (err) => {
    if (err) {
      console.log('Error writing to file:', err);
    } else {
      console.log('File hello.htm has been saved.');
    }
  });

  res.end();
});

server.listen(3333, () => {});
