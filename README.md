# Electricity Calculator App

Welcome to the Electricity Calculator App! This PHP-based application allows users to calculate power, energy, and total charge based on user input for voltage, current, and current rate.

## Features

- **Calculate Power:** Determine power consumption by providing voltage and current details.
- **Calculate Energy:** Compute energy consumption based on power and time.
- **Calculate Total Charge:** Estimate the total charge for electricity consumption using the current rate.

## Usage

1. Open the application in your browser.

2. Input the following details:
   - Voltage (V)
   - Current (A)
   - Current Rate (sen/kWh)

3. Click on the "Calculate" button to get the results.

### Formulas Used

- Power (Wh) = Voltage (V) * Current  (A)
- Energy (kWh) = Power * Hour * 1000
- Total = Energy(kWh) * (Current Rate / 100)
