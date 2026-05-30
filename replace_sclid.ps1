$base = "C:\Users\Vani\Desktop\api_integration\allenhouseagra"
Get-ChildItem -Path $base -Recurse -Filter *.php | ForEach-Object {
    $content = Get-Content -Path $_.FullName -Raw
    $new = $content -replace 'SCLID\d+', '1'
    if ($new -ne $content) {
        Set-Content -Path $_.FullName -Value $new -Encoding UTF8
        Write-Host "Updated $($_.FullName)"
    }
}
