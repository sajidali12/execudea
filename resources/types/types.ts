// types/index.ts

export interface ValidationErrors {
    [key: string]: string[];
  }
  
  export interface TInertiaPageProps {
    errors?: ValidationErrors;
    // Add any additional props that your page components might use
  }
  
  export interface User {
    id: number;
    name: string;
    email: string;
    // Add any other fields relevant to your User type
  }
  
  // Add other types/interfaces as needed
  