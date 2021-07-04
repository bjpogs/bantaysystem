const certname = document.getElementById("coi-name");
const certgender = document.getElementById("coi-gender");
const certcivil = document.getElementById("coi-civilstatus");
const certbrgycaptain = captain;
const certadd = document.getElementById("cert-add");
var pangalan;
const { PDFDocument, rgb, degrees } = PDFLib;


const capitalize = (str, lower = false) =>
  (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, (match) =>
    match.toUpperCase()
  );

certadd.addEventListener("click", () => {
  var today = new Date();
  var d = today.getDate();
  var y = today.getFullYear();
  var m = today.getMonth();
  var month = ["January", "February","March", "April", "May", "June", "July", "August", "September", "October", "November","December"];
  m = month[m];
  if(d == 1)
    d = d + "st";
  else if (d == 2)
    d = d + "nd";
  else if (d == 3)
    d = d + "rd";
  else
    d = d + "th";
  const valday = d;
  
  const valmonth = m + ", " + y;
  const valgender = certgender.value;
  const valcivil = certcivil.value;
  const valname = capitalize(certname.value);
  //const valgender = capitalize(certgender.value);
  //const valcivil = capitalize(certcivil.value);
  pangalan = valname;
  if(certname == null)
  {
    console.log("meow");
  }
  //check if the text is empty or not
  if (valname.trim() !== "" && certname.checkValidity()) {
    //console.log(val);
    generatePDF(valname,valday,valmonth,valgender,valcivil,certbrgycaptain);
  } else {
    certname.reportValidity();
  }
});

const generatePDF = async (name,day,month,gender,civil,brgycapt) => {
  const existingPdfBytes = await fetch("assets/files/brgyindigency.pdf").then((res) =>
    res.arrayBuffer()
  );

  // Load a PDFDocument from the existing PDF bytes
  const pdfDoc = await PDFDocument.load(existingPdfBytes);
  pdfDoc.registerFontkit(fontkit);

  //get font
  const fontBytes = await fetch("assets/files/Sanchez-Regular.ttf").then((res) =>
    res.arrayBuffer()
  );
  const TimesNewRoman = await fetch("assets/files/times-new-roman.ttf").then((res) =>
    res.arrayBuffer()
  );

  // Embed our custom font in the document
  const SanChezFont = await pdfDoc.embedFont(fontBytes);
  const TimesNewRomanFont = await pdfDoc.embedFont(TimesNewRoman);

  // Get the first page of the document
  const pages = pdfDoc.getPages();
  const firstPage = pages[0];

  // Draw a string of text diagonally across the first page
  firstPage.drawText(name, {
    x: 212,
    y: 447,
    size: 12,
    font: SanChezFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(gender, {
    x: 127,
    y: 431,
    size: 12,
    font: SanChezFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(civil, {
    x: 194,
    y: 431,
    size: 12,
    font: SanChezFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(day, {
    x: 168,
    y: 310,
    size: 12,
    font: SanChezFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(month, {
    x: 243,
    y: 310,
    size: 12,
    font: SanChezFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(brgycapt, {
    x: 370,
    y: 240,
    size: 12,
    font: TimesNewRomanFont,
    color: rgb(0, 0, 0),
  });

  // Serialize the PDFDocument to bytes (a Uint8Array)
  const pdfBytes = await pdfDoc.save();
  console.log("Done creating");

  // this was for creating uri and showing in iframe

  // const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
  // document.getElementById("pdf").src = pdfDataUri;

  var file = new File(
    [pdfBytes],
    pangalan+ " Indigency.pdf",
    {
      type: "application/pdf;charset=utf-8",
    }
  );
 saveAs(file);
 $('#showCertofIndigency').modal('hide');
};

$('#showCertofIndigency').on('show.bs.modal', function(e){
      var opener = e.relatedTarget;
      var resname = $(opener).attr('resname');
      var resgender = $(opener).attr('resgender');
      var rescivil = $(opener).attr('rescivil');
      if(resgender == null)
        resgender = "Male";
      if(rescivil == null)
        rescivil = "Single";
      $('#showCertofIndigency').find('[name="coi-name"]').val(resname);
      $('#showCertofIndigency').find('[name="coi-gender"]').val(resgender);
      $('#showCertofIndigency').find('[name="coi-civilstatus"]').val(rescivil);
})
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }       
  }
}
// init();