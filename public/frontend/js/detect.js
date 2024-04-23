function onDevToolsOpen() {
  // document.getElementById('status').textContent = 'opened';
  setTimeout(console.clear.bind(console))
  setTimeout(() => {console.log(
    "%cDevTools is open!",
    "color:red"
  )}, 10);
  window.location.href = 'https://www.google.com';
}

class DevToolsChecker extends Error {
  toString() {

  }

  get message() {
    onDevToolsOpen();
  }
}

console.log(new DevToolsChecker());

// function onDevToolsOpen() {
//   // Redirect to Google
//   window.location.href = 'https://www.google.com';
// }

// class DevToolsChecker extends Error {
//   constructor() {
//     super();
//     this.message = 'Check for developer tools';
//   }

//   get stack() {
//     onDevToolsOpen();
//     return super.stack;
//   }
// }

// console.log(new DevToolsChecker());
