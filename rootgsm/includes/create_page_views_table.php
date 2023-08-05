CREATE TABLE page_views (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_name VARCHAR(255) NOT NULL,
    view_count INT NOT NULL DEFAULT 0
);
