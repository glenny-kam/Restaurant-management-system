<?php
include 'connection.php';
// Include the FPDF class
require_once('pdf/fpdf.php');

// Custom PDF class that extends FPDF
class PDF extends FPDF {
    // Header function to display  text at the top of the page
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 6, 'GLENNY RESTAURANT & EATERIES', 0, 1, 'C');  
        $this->Cell(0, 6, 'P.o Box 5037-9', 0, 1, 'C');         
        $this->Cell(0, 6, 'Nairobi', 0, 1, 'C');    
        $this->Cell(0, 6, 'SALES REPORT', 0, 1, 'L');        
                      
        
        $this->Ln(10);  
        // Table headers
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 10, 'No', 1);  
        $this->Cell(40, 10, 'Product Name', 1);  
        $this->Cell(20, 10, 'Quantity', 1);     
        $this->Cell(25, 10, 'KSH Price', 1);  
        $this->Cell(25, 10, 'KSH Total', 1);  
        $this->Cell(50, 10, 'Date/Time', 1);  
        $this->Ln();
    }

    // Footer function for page numbers
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create a new instance of the PDF class
$pdf = new PDF();
$pdf->AddPage();


$sql = "SELECT * FROM sales ORDER BY product_name";  
$result = $conn->query($sql);


$counter = 1;  


$previous_product = "";
$product_total = 0;  // Variable to store the total for each product

if ($result->num_rows > 0) {
    // Output each row of data in the sales table
    while ($row = $result->fetch_assoc()) {
     
        if ($row['product_name'] != $previous_product) {
            // If there's a previous product, output the total for the last group
            if ($previous_product != "") {
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(100, 8, 'Total', 1, 0, 'L');

                $pdf->Cell(25, 8, 'Ksh ' . number_format($product_total), 1, 0, 'L');
                $pdf->Ln();
            }

            // Add a new product name header in the PDF when the product changes
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, 'Product: ' . $row['product_name'], 0, 1, 'L');
            $pdf->Ln(5);  

            // Reset the product total for the new product
            $product_total = 0;
            $previous_product = $row['product_name'];  // Update the previous product name
        }

        // Output the sales data for each product
        $pdf->SetFont('Arial', '', 10);
        
        $pdf->Cell(15, 10, $counter, 1);  
        $pdf->Cell(40, 10, $row['product_name'], 1);  
        $pdf->Cell(20, 10, $row['quantity'], 1);  
        $pdf->Cell(25, 10, 'Ksh ' . number_format($row['price']), 1);  
        $pdf->Cell(25, 10, 'Ksh ' . number_format($row['total']), 1);  
        $datetime = new DateTime($row["time"]);
        $pdf->Cell(50, 10, date_format($datetime,'Y-m-d H:i'), 1);  
        $pdf->Ln();

        // Add the total of the current sale to the product's total
        $product_total += $row['total'];

     
        $counter++;
    }

    // Output the total for the last product group
    if ($previous_product != "") {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 8, 'Total', 1, 0, 'L');

        $pdf->Cell(25, 8, 'Ksh ' . number_format($product_total), 1, 0, 'L');
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No sales data found', 0, 1, 'C');
}

// Output the PDF with the custom filename
$pdf->Output('D', 'sales_report_2025.pdf');
?>
