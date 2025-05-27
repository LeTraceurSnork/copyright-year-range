# Copyright Year Range Helper

[![Coverage Status](https://coveralls.io/repos/github/LeTraceurSnork/copyright-year-range/badge.svg)](https://coveralls.io/github/LeTraceurSnork/copyright-year-range)

A simple PHP utility for generating dynamic copyright year ranges in your projects.

## Quick installation

```bash
composer require letraceursnork/copyright-year-range
```

## Purpose

This package provides an easy way to format copyright years, automatically handling cases where the start year matches the current year. Instead of hardcoding dates like © 2020 - 2025, you can generate them dynamically, ensuring your copyright notices stay up to date.
Forget about `if`s like this:

```php
if ($year !== '2024') { // The year that copyright starts
    echo "© 2024 - $year"
} else {
    echo "© $year";
}
```

Just use this:

```php
echo CopyrightHelper::getCopyrightString(2020); // Output: "2020 - 2025" (if current year is 2025)
echo CopyrightHelper::getCopyrightString(2025); // Output: "2025" (if current year is 2025)
```

## Custom formatting

```php
CopyrightHelper::setFormat('%1$s – %2$s'); // Using an en dash  
echo CopyrightHelper::getCopyrightString(2020); // "2020 – 2023"  

CopyrightHelper::setFormat('%1$s <= = => %2$s');  
echo CopyrightHelper::getCopyrightString(2020); // "2020 <= = => 2023"  
```

## Perfect For

- Websites & web applications
- Open-source projects
- Documentation footers
- Automatically updating copyright notices

Keep your copyright notices fresh with zero maintenance! 🚀
