// src/types/index.ts

export interface ValidationErrors {
    current_password?: string[];
    password?: string[];
    password_confirmation?: string[];
  }
  
  export interface TInertiaPageProps {
    errors?: ValidationErrors;
  }
  
  export interface User {
    id: number;
    name: string;
    email: string;
    // Add other user fields if necessary
  }
  