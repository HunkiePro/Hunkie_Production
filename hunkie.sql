-- Create a table for the client bookings
CREATE TABLE IF NOT EXISTS clientorders (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    bookingDate DATE NOT NULL,
    bookingTime TIME NOT NULL,
    message TEXT,
    agreedToTerms BOOLEAN NOT NULL,
    booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a table for subscriptions
CREATE TABLE IF NOT EXISTS Subscriptions (
    subscriptionID INT AUTO_INCREMENT PRIMARY KEY,
    subscriberEmail VARCHAR(255) NOT NULL,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a table for quote requests
CREATE TABLE IF NOT EXISTS QuoteRequests (
    requestID INT AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    services TEXT NOT NULL,
    agreedToTerms BOOLEAN NOT NULL,
    requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create a table for testimonials
CREATE TABLE IF NOT EXISTS Testimonials (
    testimonialID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    clientImage VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    agreedToTerms BOOLEAN NOT NULL,
    testified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create a table for contact messages
CREATE TABLE IF NOT EXISTS ContactMessages (
    messageID INT AUTO_INCREMENT PRIMARY KEY,
    senderName VARCHAR(255) NOT NULL,
    senderEmail VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Create a table for bookings
CREATE TABLE IF NOT EXISTS Bookings (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    bookedDate DATE NOT NULL,
    bookedTime TIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


