const readline = require("readline-sync");

let input = readline.question("n : ");

function helloworld(number) {
  let output = [];

  for (let n = 1; n <= number; n++) {
    if (n == 4) {
      output.push("hello");
    } else if (n == 5) {
      output.push("world");
    } else {
      output.push(n);
    }
  }

  return output;
}

let result = helloworld(input);
console.log(result.join(" "));
