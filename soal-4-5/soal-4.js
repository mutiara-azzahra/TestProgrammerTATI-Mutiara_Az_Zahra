const readline = require("readline-sync");

let hasil_kerja = readline.question("Hasil kerja : ");
let perilaku = readline.question("Perilaku : ");

if (hasil_kerja === "diatas ekspektasi" && perilaku === "diatas ekspektasi") {
  console.log("Sangat Baik");
} else if (
  ((hasil_kerja === "diatas ekspektasi" || "sesuai ekspektasi") &&
    perilaku === "sesuai ekspektasi") ||
  (hasil_kerja === "sesuai ekspektasi" && perilaku === "diatas ekspektasi")
) {
  console.log("Baik");
} else if (
  hasil_kerja === "dibawah ekspektasi" &&
  (perilaku === "diatas ekspektasi" || "sesuai ekspektasi")
) {
  console.log("Butuh Perbaikan");
} else if (
  (hasil_kerja === "diatas ekspektasi" || "sesuai ekspektasi") &&
  perilaku === "dibawah ekspektasi"
) {
  console.log("Kurang/misconduct");
} else if (
  hasil_kerja === "dibawah ekspektasi" &&
  perilaku === "dibawah ekspektasi"
) {
  console.log("Sangat kurang");
}
