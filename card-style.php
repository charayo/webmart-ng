<!DOCTYPE html>
<html lang="en">
<body>
<style>
        .a-row {
            display: grid;
            grid-template-columns: auto auto auto;
            /* gap: 10px; */
            row-gap: 30px;
        }

        .img-thumbnail {
            border: none;
        }

        .card {
            width: 90% !important;
        }

        /* mobile screen view */
        @media only screen and (max-width : 768px) {
            .a-row {
                grid-template-columns: auto;
            }

            .card {
                width: 100% !important;
            }
        }
    </style>
</body>
</html>